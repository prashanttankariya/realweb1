<div class="jumbotron">
    <h1 class="display-4">{{ $text }}</h1>
    <hr class="my-4">

    <button onclick="allowNotification()" class="btn btn-warning">Allow notification</button>
    <button class="btn btn-primary" wire:click="notify">Send Notification</button>
    
</div>


{{-- firebase --}}
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
  apiKey: "AIzaSyDGJrO8P8DsdWE6N7fE3eCQX3iP621e8Q8",
  authDomain: "realweb1.firebaseapp.com",
  projectId: "realweb1",
  storageBucket: "realweb1.appspot.com",
  messagingSenderId: "1070225952606",
  appId: "1:1070225952606:web:37b12eb0ea014f1a4349cf",
  measurementId: "G-6MRHKVRCZN"
};
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  //firebase.analytics();

//messeging
const messaging = firebase.messaging();


function allowNotification(){

  
  const messaging = firebase.messaging();
  messaging.requestPermission()
  .then(function(){
      console.log('Have Permission.');
      return messaging.getToken()
      

  })
  .then(function(token){
      console.log('token is ' + token);

      //send token to store as devicetoken of user
      $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                    },
                });

           

  })
  .catch(function(err){

        console.log('permission not allowed.');
  });
}

  


  messaging.onMessage(function (payload) {
        const title = payload.notification.title;
        const options = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(title, options);
    });

</script>