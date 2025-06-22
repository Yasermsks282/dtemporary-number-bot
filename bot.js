
// bot.js

const TelegramBot = require('node-telegram-bot-api');
const axios = require('axios');
const { TOKEN, ADMIN_ID, CHANNELS, SOURCES } = require('./config');
const bot = new TelegramBot(TOKEN, { polling: true });

function maskNumber(number) {
  return number.slice(0, 6) + '**' + number.slice(-4);
}

bot.onText(/\/start/, async (msg) => {
  const chatId = msg.chat.id;
  bot.sendMessage(chatId, `مرحباً بك في بوت الأرقام الوهمية 🇸🇦📱

🔘 استخدم الأزرار أدناه لاختيار العملية:
`, {
    reply_markup: {
      inline_keyboard: [
        [{ text: "📱 جلب رقم", callback_data: "get_number" }],
        [{ text: "🔄 تحديث الرسائل", callback_data: "refresh_sms" }]
      ]
    }
  });
});

bot.onText(/\/admin/, (msg) => {
  if (msg.from.id != ADMIN_ID) return;
  const opts = {
    reply_markup: {
      inline_keyboard: [
        [{ text: "➕ إضافة قناة", callback_data: "add_channel" }],
        [{ text: "➖ حذف قناة", callback_data: "remove_channel" }],
        [{ text: "🌐 إضافة مصدر", callback_data: "add_source" }],
        [{ text: "❌ حذف مصدر", callback_data: "remove_source" }]
      ]
    }
  };
  bot.sendMessage(msg.chat.id, "🛠 لوحة تحكم الأدمن:", opts);
});

// استجابة للأزرار (مثال واحد)
bot.on("callback_query", async (query) => {
  const chatId = query.message.chat.id;

  if (query.data === "get_number") {
    const source = SOURCES[0];
    try {
      const res = await axios.get(source + "/api/numbers");
      const number = res.data.numbers[0]?.number || "لا يوجد رقم الآن";
      const masked = maskNumber(number);
      bot.sendMessage(chatId, `📱 رقم جديد: ${masked}`);
    } catch (err) {
      bot.sendMessage(chatId, "❌ فشل في جلب الرقم.");
    }
  }
});
