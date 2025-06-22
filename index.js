const { Telegraf } = require("telegraf");
const express = require("express");
const config = require("./config.json");

const bot = new Telegraf(config.token);

bot.start((ctx) => ctx.reply("أهلاً بك في بوت الأرقام الوهمية!"));

bot.launch();

const app = express();
const port = process.env.PORT || 3000;

app.get("/", (req, res) => {
  res.send("البوت يعمل ✅");
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
