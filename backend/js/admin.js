document.addEventListener('DOMContentLoaded', () => {
  // Verifica login via localStorage
  if (localStorage.getItem('loggedIn') !== 'true') {
  const loginModal = document.getElementById('login-modal');
  if (loginModal) {
    loginModal.classList.remove('hidden');
  }
  }

  function fecharLoginModal() {
  document.getElementById('login-modal')?.classList.add('hidden');
  }
  

  // Botão de novo usuário
  const btnAdd = document.getElementById('add-user-btn');
  const modal = document.getElementById('user-form-modal');
  const cancel = document.getElementById('cancel-form');

  if (btnAdd) {
    btnAdd.addEventListener('click', () => {
      window.location.href = 'index.php?action=edit';
    });
  }
  
  if (cancel) {
    cancel.addEventListener('click', e => {
      e.preventDefault();
      modal?.classList.add('hidden');
      window.location.href = 'index.php';
    });
  }

  // Toggle tema
  const saved = localStorage.getItem('theme') || 'light';
  setTheme(saved);

  document.getElementById('theme-toggle')?.addEventListener('click', () => {
    const next = document.body.classList.toggle('dark-mode') ? 'dark' : 'light';
    localStorage.setItem('theme', next);
  });
});

function setTheme(theme) {
  if (theme === 'dark') document.body.classList.add('dark-mode');
  else document.body.classList.remove('dark-mode');
}
