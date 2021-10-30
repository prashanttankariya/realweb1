importScripts('https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js');


const firebaseConfig = {
    apiKey: "AIzaSyDGJrO8P8DsdWE6N7fE3eCQX3iP621e8Q8",
    authDomain: "realweb1.firebaseapp.com",
    projectId: "realweb1",
    storageBucket: "realweb1.appspot.com",
    messagingSenderId: "1070225952606",
    appId: "1:1070225952606:web:37b12eb0ea014f1a4349cf",
    measurementId: "G-6MRHKVRCZN"
  };

  firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);

    const title = "Hello world is awesome";
    const options = {
        body: "New order has been arrived.",
        icon: "images/suzy.png",
    };

    return self.registration.showNotification(
        title,
        options,
    );
});