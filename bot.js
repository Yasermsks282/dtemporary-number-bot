
const TelegramBot = require('node-telegram-bot-api');

// التوكن الخاص بالبوت
const token = '7827994564:AAG0G-H81iQmThetz46RKvWaup4bpDtDuo4';

// إعداد البوت باستخدام الاستطلاع (polling)
const bot = new TelegramBot(token, { polling: true });

// رسالة ترحيب عند بدء المحادثة
bot.onText(/\/start/, (msg) => {
  const chatId = msg.chat.id;
  bot.sendMessage(chatId, 'مرحبًا بك في بوت الأرقام الوهمية!');
});

// أوامر أخرى يمكن إضافتها هنا حسب الحاجة

// التحقق من عمل البوت
console.log("🤖 Bot is running...");
