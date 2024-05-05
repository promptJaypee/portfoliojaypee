const { src, dist} = require("gulp")

function mytask(callback){
    callback();
    
    cb(new Error('Something bad happened'));
}

exports.mytask = mytask;