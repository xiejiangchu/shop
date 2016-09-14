var fs = require('fs');
var mysql = require('mysql');
var iconv = require('iconv-lite');

var path = './';
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'me',
  password : 'secret',
  database : 'my_db'
});

fs.readdir(path, function(err, files) {
    if (err) {
        console.log(err);
        return;
    }

    var cat1 = JSON.parse(getContent(path + "/cat1.txt"));

    console.log(cat1.categoryList);
});


function getContent(path) {
    var bin = fs.readFileSync(path);
    var content = iconv.decode(bin, 'utf16');
    return content;
}
