var ToJava = 'FromJS';
var FromJava = 'FromJava';

function dialog() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'dialog',
        function(responseData) {

        }
    );
}

function recorder_in_fy() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'recorder_in_fy',
        function(responseData) {

        }
    );
}

function recorder_in_ky() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'recorder_in_ky',
        function(responseData) {

        }
    );
}

function selsct_picture() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'selsct_picture',
        function(responseData) {

        }
    );
}

function session() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'session',
        function(message) {
            message=JSON.parse(message);
            var event = new Event("session");
            event.data = message.data;
            window.dispatchEvent(event);
        }
    );
}

function init(callback) {
    if (window.WebViewJavascriptBridge) {
        callback(WebViewJavascriptBridge)
    } else {
        document.addEventListener('WebViewJavascriptBridgeReady', function() {
                callback(WebViewJavascriptBridge)
            },
            false
        );
    }
}

init(function(bridge) {
    bridge.init(function(message, responseCallback) {
        console.log('初始化成功');
        responseCallback('初始化成功');
    });
    bridge.registerHandler(FromJava, function(message, responseCallback) {
        message = JSON.parse(message);
        if (message.type == 'session') {
            var event = new Event("session");
            event.data = message.data;
            window.dispatchEvent(event);
        } else if (message.type == 'recorder_in_fy') {
            var event = new Event("recorder_in_fy");
            event.data = message.data;
            window.dispatchEvent(event);
        }else if (message.type == 'recorder_in_ky') {
            var event = new Event("recorder_in_ky");
            event.data = message.data;
            window.dispatchEvent(event);
        }
    });
})
