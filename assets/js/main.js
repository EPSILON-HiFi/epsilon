// Проверка авторизации и обновление навигации
firebase.auth().onAuthStateChanged((user) => {
  const navMenu = document.getElementById('nav-menu');
  const authButtons = document.getElementById('auth-buttons');
  const userInfo = document.getElementById('user-info');
  const menuToggle = document.getElementById('menu-toggle');
  
  if (user) {
    // Получаем имя пользователя
    firebase.firestore().collection('users').doc(user.uid).get().then(doc => {
      if (doc.exists) {
        const userData = doc.data();
        document.getElementById('user-name').textContent = userData.name;
        if (userData.avatar) {
          document.getElementById('user-avatar').src = userData.avatar;
        }
      }
    });
    
    // Обновляем меню
    navMenu.innerHTML = `
      <li><a href="profile.html">Профиль</a></li>
      <li><a href="characters.html">Персонажи</a></li>
      <li><a href="articles.html">Статьи</a></li>
      <li><a href="chat.html">Чаты</a></li>
    `;
    
    if (authButtons) authButtons.style.display = 'none';
    if (userInfo) userInfo.style.display = 'block';
  } else {
    navMenu.innerHTML = '<li><a href="index.html" class="active">Главная</a></li>';
    if (authButtons) authButtons.style.display = 'flex';
    if (userInfo) userInfo.style.display = 'none';
  }
});

// Функция выхода
function logout() {
  firebase.auth().signOut().then(() => {
    window.location.href = 'index.html';
  });
}

// Мобильное меню
document.addEventListener('DOMContentLoaded', () => {
  const menuToggle = document.getElementById('menu-toggle');
  const navMenu = document.getElementById('nav-menu');
  
  if (menuToggle && navMenu) {
    menuToggle.addEventListener('click', () => {
      navMenu.classList.toggle('active');
    });
  }
  
  // Закрытие меню при клике на ссылку
  document.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', () => {
      if (navMenu) navMenu.classList.remove('active');
    });
  });
});

// Уведомления
function showNotification(message, type = 'success') {
  const notification = document.createElement('div');
  notification.className = `alert alert-${type}`;
  notification.innerHTML = `
    <span>${message}</span>
  `;
  notification.style.position = 'fixed';
  notification.style.top = '80px';
  notification.style.right = '20px';
  notification.style.zIndex = '3000';
  notification.style.minWidth = '300px';
  
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.style.opacity = '0';
    notification.style.transform = 'translateX(100%)';
    setTimeout(() => notification.remove(), 300);
  }, 3000);
}
