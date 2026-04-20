const firebaseConfig = {
  apiKey: "AIzaSyAvjmo78uTKkCY96uzTiT4boDeCVoEJhOk",
  authDomain: "epsilonbase-316d2.firebaseapp.com",
  projectId: "epsilonbase-316d2",
  storageBucket: "epsilonbase-316d2.firebasestorage.app",
  messagingSenderId: "230539197818",
  appId: "1:230539197818:web:7ddae53c499b318f6caac3"
};

firebase.initializeApp(firebaseConfig);
const auth = firebase.auth();
const db = firebase.firestore();
const storage = firebase.storage();
