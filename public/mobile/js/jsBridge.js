var ToJava = 'FromJS';
var FromJava = 'FromJava';
function dialog() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'dialog',
        function (responseData) {
            document.getElementById("show").innerHTML = responseData
        }
    );
}

function house() {
    window.WebViewJavascriptBridge.callHandler(
        ToJava, 'house_select',
        function (responseData) {
            document.getElementById("show").innerHTML = responseData
        }
    );
}

function callNative() {
    var str1 = document.getElementById("text1").value;
    var str2 = document.getElementById("text2").value;
    window.WebViewJavascriptBridge.callHandler(
        ToJava, {
            'name': str1,
            'password': str2
        },
        function (responseData) {
            document.getElementById("show").innerHTML = responseData
        }
    );
}

function connectWebViewJavascriptBridge(callback) {
    if (window.WebViewJavascriptBridge) {
        callback(WebViewJavascriptBridge)
    } else {
        document.addEventListener('WebViewJavascriptBridgeReady', function () {
                callback(WebViewJavascriptBridge)
            },
            false
        );
    }
}
connectWebViewJavascriptBridge(function (bridge) {
    bridge.init(function (message, responseCallback) {
        console.log('初始化成功');
        responseCallback('初始化成功');
    });
    bridge.registerHandler(FromJava, function (data, responseCallback) {
        document.getElementById("show").innerHTML = (data);
        var responseData = "Javascript Says Right back aka!";
        alert('fasdasd');
        responseCallback(responseData);
    });
})