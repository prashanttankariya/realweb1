var firebaseConfig = {
    apiKey: "AIzaSyDGJrO8P8DsdWE6N7fE3eCQX3iP621e8Q8",
    authDomain: "realweb1.firebaseapp.com",
    projectId: "realweb1",
    storageBucket: "realweb1.appspot.com",
    messagingSenderId: "1070225952606",
    appId: "1:1070225952606:web:b6ecdeea8f013e7e4349cf",
    measurementId: "G-X94EHB36NQ"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();


  // messenging
  const messaging = firebase.messaging();
  messaging
.requestPermission()
.then(function () {
  console.log("custom : Notification permission granted.");

  // get the token in the form of promise
  //return messaging.getToken()
})
// .then(function(token) {
//     // print the token on the HTML page
//      console.log("token is : " + token);
// })
.catch(function (err) {
  console.log("custom : Unable to get permission to notify.", err);
});
  