// Проверка авторизации и обновление навигации
firebase.auth().onAuthStateChanged((user) => {
  const navMenu = document.getElementById('nav-menu');
  const authButtons = document.getElementById('auth-buttons');
  const userInfo = document.getElementById('user-info');
  
  if (user) {
    // Получаем имя пользователя
    firebase.firestore().collection('users').doc(user.uid).get().then(doc => {
      if (doc.exists) {
        document.getElementById('user-name').textContent = doc.data().name;
      }
    });
    
    // Обновляем меню
    navMenu.innerHTML = `
      <li><a href="profile.html">Профиль</a></li>
      <li><a href="characters.html">Персонажи</a></li>
      <li><a href="articles.html">Статьи</a></li>
      <li><a href="chat.html">Чаты</a></li>
    `;
    
    authButtons.style.display = 'none';
    userInfo.style.display = 'block';
  } else {
    navMenu.innerHTML = '<li><a href="index.html" class="active">Главная</a></li>';
    authButtons.style.display = 'block';
    userInfo.style.display = 'none';
  }
});

// Функция выхода
function logout() {
  firebase.auth().signOut().then(() => {
    window.location.href = 'index.html';
  });
}
