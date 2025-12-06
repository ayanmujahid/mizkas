importScripts("https://www.gstatic.com/firebasejs/12.6.0/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/12.6.0/firebase-messaging-compat.js");

firebase.initializeApp({
    apiKey: "AIzaSyCnl8gGKrT-AtBkIb5ESLunsYQoWUvBbaU",
    authDomain: "admin-web-push.firebaseapp.com",
    projectId: "admin-web-push",
    storageBucket: "admin-web-push.firebasestorage.app",
    messagingSenderId: "949679705720",
    appId: "1:949679705720:web:28bc69c05eebe264a1e78d"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
    self.registration.showNotification(payload.notification.title, {
        body: payload.notification.body,
        icon: "/icon.png"
    });
});
