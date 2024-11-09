const config = require("../../config");
const { useDB } = require("@zibot/zihooks");

module.exports.data = {
	name: "ZiRank",
	type: "ranksys",
};

/**
 * @param { import ("discord.js").User } user
 * @param { Number } XpADD
 */

module.exports.execute = async ({ user, XpADD = 1 }) => {
	try {
	  const DataBase = useDB();
	  if (!DataBase || !DataBase.ZiUser) {
		console.error('Database hoặc model ZiUser không khả dụng.');
		return require(`./../../lang/${config?.DeafultLang}`);
	  }
  
	  const { xp = 1, level = 1, coin = 1, lang } =
		(await DataBase.ZiUser.findOne({ userID: user.id })) || {};
  
	  let newXp = xp + XpADD;
	  let newLevel = level;
	  let newCoin = coin;
  
	  const xpThreshold = newLevel * 50 + 1;
	  if (newXp > xpThreshold) {
		newLevel += 1;
		newXp = 1;
		newCoin += newLevel * 100;
	  }
  
	  await DataBase.ZiUser.updateOne(
		{ userID: user.id },
		{ $set: { xp: newXp, level: newLevel, coin: newCoin } },
		{ upsert: true }
	  );
  
	  const langdef = require(`./../../lang/${lang || config?.DeafultLang}`);
	  return langdef;
	} catch (error) {
	  console.error('Lỗi khi xử lý tương tác:', error);
	  return require(`./../../lang/${config?.DeafultLang}`);
	}
};
  
