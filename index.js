const TelegramBot = require("node-telegram-bot-api");
const axios = require("axios");

const token = "8121608942:AAE2pmnJnPNw2KNhiDYnie78EfMfNRWujj8";
const adminId = 7690150728;
const channelUsername = "@smscobnm";
const bot = new TelegramBot(token, { polling: true });

let sources = [
  { name: "TemporaryPhoneNumber", url: "https://temporary-phone-number.com/" },
  { name: "SMSReceiveFree", url: "https://smsreceivefree.com/" },
  { name: "FreePhoneNum", url: "https://freephonenum.com/" },
  { name: "ReceiveSMSS", url: "https://receive-smss.com/" },
  { name: "ReceiveFreeSMS", url: "https://receivefreesms.net/" }
];

bot.onText(/\/start/, (msg) => {
  const chatId = msg.chat.id;
  const opts = {
    reply_markup: {
      keyboard: [[{ text: "📲 احصل على رقم" }]],
      resize_keyboard: true
    }
  };
  bot.sendMessage(chatId, "مرحبًا بك في بوت الأرقام الوهمية المجانية.", opts);
});

bot.on("message", async (msg) => {
  const chatId = msg.chat.id;
  const text = msg.text;

  if (text === "📲 احصل على رقم") {
    try {
      const number = "+9982882**221"; // رقم وهمي كمثال
      const code = Math.floor(10000 + Math.random() * 90000);
      const message = `لا تشارك الرمز مع أحد
الرقم: ${number}
الكود: ${code}`;
      await bot.sendMessage(channelUsername, message);
      bot.sendMessage(chatId, `✅ تم إرسال الرقم إلى القناة ${channelUsername}`);
    } catch (err) {
      bot.sendMessage(chatId, "❌ فشل في جلب الرقم.");
    }
  }

  if (text === "/admin" && msg.from.id === adminId) {
    const adminOpts = {
      reply_markup: {
        inline_keyboard: [
          [{ text: "➕ إضافة قناة", callback_data: "add_channel" }],
          [{ text: "➕ إضافة مصدر أرقام", callback_data: "add_source" }]
        ]
      }
    };
    bot.sendMessage(chatId, "مرحبًا بك في لوحة الإدارة:", adminOpts);
  }
});

bot.on("callback_query", (query) => {
  const chatId = query.message.chat.id;
  if (query.data === "add_channel") {
    bot.sendMessage(chatId, "أرسل معرف القناة بالشكل @example");
  } else if (query.data === "add_source") {
    bot.sendMessage(chatId, "أرسل رابط الموقع الذي يدعم الأرقام.");
  }
});