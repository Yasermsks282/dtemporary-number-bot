
const TelegramBot = require('node-telegram-bot-api');
const token = '8121608942:AAE2pmnJnPNw2KNhiDYnie78EfMfNRWujj8';
const bot = new TelegramBot(token, { polling: true });

const adminId = 7690150728;

// 🟦 أمر /start
bot.onText(/\/start/, (msg) => {
  bot.sendMessage(msg.chat.id, 'أهلاً بك في بوت الأرقام الوهمية 👋\n\nاضغط على /admin إن كنت الأدمن.');
});

// 🟥 أمر /admin للأدمن فقط
bot.onText(/\/admin/, (msg) => {
  if (msg.from.id !== adminId) {
    return bot.sendMessage(msg.chat.id, '❌ هذا الأمر مخصص للأدمن فقط.');
  }

  bot.sendMessage(msg.chat.id, 'لوحة التحكم 🛠️:', {
    reply_markup: {
      inline_keyboard: [
        [{ text: '➕ إضافة قناة', callback_data: 'add_channel' }],
        [{ text: '➕ إضافة مصدر أرقام', callback_data: 'add_source' }]
      ]
    }
  });
});

// 🟩 التعامل مع ضغط الأزرار
bot.on('callback_query', async (query) => {
  const data = query.data;
  const chatId = query.message.chat.id;

  if (data === 'add_channel') {
    bot.sendMessage(chatId, '📢 أرسل معرف القناة التي تريد إضافتها (مع @)');
  }

  if (data === 'add_source') {
    bot.sendMessage(chatId, '🌐 أرسل رابط الموقع الذي تريد ربطه كمصدر للأرقام');
  }

  // رد افتراضي لمنع زر التحميل من البقاء
  bot.answerCallbackQuery(query.id);
});
