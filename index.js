const TelegramBot = require('node-telegram-bot-api');
const axios = require('axios');
const fs = require('fs');

const bot = new TelegramBot('8121608942:AAE2pmnJnPNw2KNhiDYnie78EfMfNRWujj8', { polling: true });

const adminId = 7690150728;
let channels = [];
let sources = [
  "https://smsreceivefree.com",
  "https://sms-online.co",
];

function hidePhoneNumber(number) {
  return number.slice(0, 5) + '**' + number.slice(-4);
}

bot.onText(/\/start/, (msg) => {
  const chatId = msg.chat.id;
  bot.sendMessage(chatId, 'مرحبًا بك في بوت الأرقام الوهمية! 📨\nاختر من الأزرار:', {
    reply_markup: {
      keyboard: [
        ['📲 جلب رقم وهمي'],
        ['📢 إضافة قناة اشتراك', '🌐 إضافة مصدر']
      ],
      resize_keyboard: true,
      one_time_keyboard: false
    }
  });
});

bot.on('message', async (msg) => {
  const chatId = msg.chat.id;
  const text = msg.text;

  if (text === '📲 جلب رقم وهمي') {
    // مثال تجريبي فقط - الموقع لا يوفر API مباشر
    const fakeNumber = '+99828823221';
    const code = '48844';
    const hidden = hidePhoneNumber(fakeNumber);
    bot.sendMessage(chatId, `✅ تم جلب رقم:\nالرقم: ${hidden}\nالكود: ${code}`);
    bot.sendMessage('@smscobnm', `رقم جديد: ${hidden}\nالكود: ${code}`);
  }

  if (chatId == adminId && text === '📢 إضافة قناة اشتراك') {
    bot.sendMessage(chatId, 'أرسل معرف القناة (مثال: @channel_name)');
  }

  if (chatId == adminId && text === '🌐 إضافة مصدر') {
    bot.sendMessage(chatId, 'أرسل رابط الموقع المصدر الجديد');
  }

  if (chatId == adminId && text.startsWith('@')) {
    if (!channels.includes(text)) {
      channels.push(text);
      bot.sendMessage(chatId, `✅ تم إضافة القناة: ${text}`);
    } else {
      bot.sendMessage(chatId, '⚠️ هذه القناة مضافة مسبقًا');
    }
  }

  if (chatId == adminId && text.startsWith('http')) {
    if (!sources.includes(text)) {
      sources.push(text);
      bot.sendMessage(chatId, `✅ تم إضافة المصدر: ${text}`);
    } else {
      bot.sendMessage(chatId, '⚠️ هذا المصدر مضاف مسبقًا');
    }
  }
});