if (process.argv.length != 3) {
  console.log("\x1b[31mUsage: node generate_env.js <google_api_key>\x1b[0m");
  process.exit(1);
}

let KEYS = ["MYSQL_HOST", "MYSQL_USER", "MYSQL_PASSWORD", "MYSQL_DATABASE"];

let JWT_KEY = require('crypto').randomBytes(64).toString('hex');

const fs = require('fs');

console.log(JWT_KEY);

let content = "JWT_KEY = " + JWT_KEY;
content += "\n" + "GOOGLE_API_KEY = " + process.argv[2];

for (let i = 0; i < KEYS.length; i++) {
  content += "\n" + KEYS[i] + " = ";
}

fs.writeFile('.env', "", err => {
  if (err) {
    console.error(err);
  }
});

fs.appendFile('.env', content, err => {
  if (err) {
    console.error(err);
  }
});
