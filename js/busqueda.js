function searchProfiles() {
    const input = document.getElementById('search-input').value;
  
    fetch(`php/buscar_usuarios.php?q=${encodeURIComponent(input)}`)
      .then(response => response.json())
      .then(data => {
        const container = document.querySelector('.cards-container');
        container.innerHTML = '';
  
        if (data.length === 0) {
          container.innerHTML = '<p class="no-results">No se encontraron usuarios.</p>';
          return;
        }
  
        data.forEach(user => {
          container.innerHTML += `
            <a href="perfil.php?id=${user.id_Usuario}" class="Card-individual">
              <div class="profile-picture-container">
                <img src="images/PorfileP.png" class="profile-picture">
              </div>
              <div class="profile-info">
                <h2 class="profile-username">@${user.nom_usuario}</h2>
                <p class="profile-fullname">${user.nombre}</p>
              </div>
            </a>
          `;
        });
      })
      .catch(error => {
        console.error("Error al buscar usuarios:", error);
      });
  }
  
  document.addEventListener("DOMContentLoaded", searchProfiles);
  