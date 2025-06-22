
const TelegramBot = require('node-telegram-bot-api');
const axios = require('axios');
const fs = require('fs');

const token = '8121608942:AAE2pmnJnPNw2KNhiDYnie78EfMfNRWujj8';
const bot = new TelegramBot(token, { polling: true });

const ADMIN_ID = 7690150728;
let forcedChannels = ['@smscobnm'];
let sources = [
  'https://api.freephonenum.com/v1/phones',  // مثال لمصدر أرقام
  'https://api.receivesmsonline.net/v1/numbers'
];

function hideNumber(number) {
  return number.slice(0, 6) + '**' + number.slice(-2);
}

bot.onText(/\/start/, (msg) => {
  const chatId = msg.chat.id;
  const text = `
مرحبا بك في بوت صيد الأرقام الوهمية 🔍

يمكنك استخدام الأزرار التالية لاختيار الدولة وجلب رقم وهمي.
`;
  const options = {
    reply_markup: {
      keyboard: [
        ['🇸🇦 رقم سعودي', '🇺🇸 رقم أمريكي'],
        ['🔄 تحديث الرسائل القصيرة']
      ],
      resize_keyboard: true
    }
  };
  bot.sendMessage(chatId, text, options);
});

bot.onText(/\/admin/, (msg) => {
  if (msg.from.id != ADMIN_ID) return;
  const options = {
    reply_markup: {
      inline_keyboard: [
        [{ text: 'إضافة قناة اشتراك', callback_data: 'add_channel' }],
        [{ text: 'إضافة مصدر أرقام', callback_data: 'add_source' }]
      ]
    }
  };
  bot.sendMessage(msg.chat.id, 'لوحة تحكم الأدمن:', options);
});

bot.on('message', async (msg) => {
  const chatId = msg.chat.id;
  if (msg.text === '🇸🇦 رقم سعودي') {
    fetchNumber(chatId, 'SA');
  } else if (msg.text === '🇺🇸 رقم أمريكي') {
    fetchNumber(chatId, 'US');
  }
});

async function fetchNumber(chatId, country) {
  try {
    const source = sources[0];
    const res = await axios.get(source);
    const numbers = res.data;
    const filtered = numbers.filter(n => n.country === country);
    if (filtered.length === 0) {
      bot.sendMessage(chatId, '❌ فشل في جلب الرقم.');
      return;
    }
    const number = filtered[0];
    const msgText = `تم جلب رقم جديد ✅

📱 الرقم: ${hideNumber(number.number)}
🌍 الدولة: ${number.country}
`;
    bot.sendMessage(chatId, msgText);

    // إرسال إلى القناة
    bot.sendMessage(forcedChannels[0], msgText);
  } catch (err) {
    bot.sendMessage(chatId, '❌ فشل في جلب الرقم.');
    console.error('خطأ في الجلب:', err.message);
  }
}
