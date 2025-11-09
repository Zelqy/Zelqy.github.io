// script.js - fitur interaktif

// ===== Data contoh destinasi =====
const DESTINATIONS = {
  1: {
    id:1, title: "Pantai Pink", image: "assets/img/assets/img/pink beach.jpg",
    desc: "Pantai Pink Lombok Timur terkenal karena pasirnya yang berwarna merah muda, hasil campuran pasir putih dan serpihan karang merah. Air lautnya jernih dan berwarna biru toska, dikelilingi bukit hijau yang indah. Suasananya tenang dan alami, cocok untuk bersantai atau menikmati pemandangan. Keindahan warna pasir dan lautnya membuat pantai ini menjadi salah satu tempat terindah di Lombok Timur.",
    location: "Sekaroh, Jerowaru, Kabupaten Lombok Timur, Nusa Tenggara Bar. 83672"
  },
  2: {
    id:2, title: "Air Terjun Sendang Gile", image: "assets/img/destinasi2.jpg",
    desc: "Air Terjun Sendang Gile terletak di Desa Senaru, Lombok Utara, dan merupakan salah satu air terjun terkenal di kaki Gunung Rinjani. Airnya jernih dan sejuk, jatuh bertingkat di antara tebing hijau dan pepohonan rimbun, menciptakan suasana alami dan menenangkan. Tempat ini sering dikunjungi wisatawan untuk menikmati keindahan alam dan udara segar pegunungan.",
    location: "Air Terjun Sendang Gile, Senaru, Kec. Bayan, Kabupaten Lombok Utara, Nusa Tenggara Bar. 83354"
  },
  3: {
    id:3, title: "Desa Adat Sade", image: "assets/img/destinasi3.jpg",
    desc: "Desa Adat Sade terletak di Lombok Tengah dan dikenal sebagai desa tradisional suku Sasak. Penduduknya masih mempertahankan rumah adat dari bambu dan ilalang, serta gaya hidup dan budaya leluhur. Di sini, pengunjung bisa melihat tenun khas Lombok, tradisi unik, dan suasana pedesaan yang autentik dan alami.",
    location: "Rembitan, Kuta, Pujut, Central Lombok Regency, West Nusa Tenggara 83573"
  },
  4: {
    id:4, title: "Bukit Marese", image: "assets/img/destinasi4.jpg",
    desc: "Bukit Merese terletak di Kawasan Mandalika, Lombok Tengah, dan terkenal dengan pemandangan alamnya yang indah. Dari puncaknya, pengunjung bisa melihat hamparan laut biru, pantai berpasir putih, dan perbukitan hijau di sekitarnya. Tempat ini sangat populer untuk menikmati matahari terbit atau terbenam dengan suasana tenang dan angin sepoi-sepoi.",
    location: "Kuta, Kec. Pujut, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83573"
  },
  5: {
    id:5, title: "Taman Mayura", image: "assets/img/destinasi5.jpg",
    desc: "Taman Mayura terletak di Cakranegara, Mataram, Lombok, dan merupakan taman bersejarah peninggalan Kerajaan Karangasem Bali. Di dalamnya terdapat kolam besar dan bangunan bale kuno yang dikelilingi taman hijau. Tempat ini memadukan keindahan alam dan nilai sejarah, menjadikannya destinasi wisata budaya yang menarik di Lombok.",
    location: "Mayura, Kec. Cakranegara, Kota Mataram, Nusa Tenggara Bar. 83239"
  },
  6: {
    id:6, title: "Spot Kuliner", image: "assets/img/destinasi6.jpg",
    desc: "Lesehan Asri Praya adalah tempat makan populer di Kota Praya, Lombok Tengah, yang menawarkan suasana nyaman dan alami. Pengunjung dapat menikmati hidangan khas Lombok seperti ayam taliwang dan plecing kangkung dengan konsep lesehan di area yang sejuk dan asri, cocok untuk bersantai bersama keluarga atau teman.",
    location: "Praya, Kec. Praya, Kabupaten Lombok Tengah, Nusa Tenggara Bar. 83511"
  }
};

// Utility untuk baca query param
function getQueryParam(name) {
  const url = new URL(window.location.href);
  return url.searchParams.get(name);
}

/* ===== detail.html logic ===== */
(function detailPageInit(){
  const id = getQueryParam('id');
  if(!id) return;
  const dest = DESTINATIONS[id];
  if(!dest) return;
  const titleEl = document.getElementById('dest-title');
  const imgEl = document.getElementById('dest-image');
  const descEl = document.getElementById('dest-desc');
  const locEl = document.getElementById('dest-location');

  if(titleEl) titleEl.innerText = dest.title;
  if(imgEl) imgEl.src = dest.image;
  if(descEl) descEl.innerText = dest.desc;
  if(locEl) locEl.innerText = dest.location;

  // Cuaca - tombol
  const btnWeather = document.getElementById('btn-weather');
  const weatherResult = document.getElementById('weather-result');
  if(btnWeather) {
    btnWeather.addEventListener('click', () => {
      const weathers = ["Cerah", "Berawan", "Hujan Ringan", "Hujan Lebat", "Berkabut"];
      const temps = Math.floor(Math.random()*10)+22; // contoh
      const pick = weathers[Math.floor(Math.random()*weathers.length)];
      if(weatherResult) weatherResult.innerText = `${pick}, ${temps}°C`;
    });
  }

  // Estimasi biaya
  const btnEstimate = document.getElementById('btn-estimate');
  if(btnEstimate) {
    btnEstimate.addEventListener('click', () => {
      const dist = parseFloat(document.getElementById('est-distance').value || 0);
      const transport = document.getElementById('est-transport').value;
      if(isNaN(dist) || dist <= 0) {
        alert('Masukkan jarak yang valid (km).');
        return;
      }
      let rate = 1000;
      if(transport === 'car') rate = 2000;
      if(transport === 'motor') rate = 800;
      const result = dist * rate;
      document.getElementById('estimate-result').innerText = `Rp ${result.toLocaleString()}`;
    });
  }
})();

/* ===== galeri.html logic ===== */
(function galleryInit(){
  const toggleBtn = document.getElementById('toggle-gallery');
  if(!toggleBtn) return;
  let shownAll = false;
  toggleBtn.addEventListener('click', () => {
    shownAll = !shownAll;
    const hiddenItems = document.querySelectorAll('#gallery-grid .hidden');
    hiddenItems.forEach(el => {
      if(shownAll) el.classList.remove('hidden');
      else el.classList.add('hidden');
    });
    toggleBtn.innerText = shownAll ? 'Sembunyikan' : 'Tampilkan Semua';
    // Scroll ke button agar UX bagus
    toggleBtn.scrollIntoView({behavior: 'smooth', block: 'end'});
  });
})();

/* ===== kontak.html logic: review form & display ===== */
(function reviewInit(){
  const form = document.getElementById('review-form');
  const reviewsList = document.getElementById('reviews-list');

  function loadReviews() {
    const all = JSON.parse(localStorage.getItem('reviews') || '[]');
    if(!reviewsList) return;
    reviewsList.innerHTML = '';
    if(all.length === 0) {
      reviewsList.innerHTML = '<p class="text-muted">Belum ada ulasan.</p>';
      return;
    }
    // tampilkan terbalik (terbaru di atas)
    all.slice().reverse().forEach(r => {
      const div = document.createElement('div');
      div.className = 'card p-3';
      div.innerHTML = `<strong>${escapeHtml(r.name)}</strong> <small class="text-muted">(${escapeHtml(r.email)}) - Rating: ${r.rating}</small>
        <p class="mt-2 mb-0">${escapeHtml(r.message)}</p>`;
      reviewsList.appendChild(div);
    });
  }

  if(form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const name = document.getElementById('input-name').value.trim();
      const email = document.getElementById('input-email').value.trim();
      const message = document.getElementById('input-message').value.trim();
      const rating = document.getElementById('input-rating').value;

      if(!name || !email || !message || !rating) {
        alert('Semua field wajib diisi.');
        return;
      }
      // simple email validation
      if(!/^\S+@\S+\.\S+$/.test(email)) {
        alert('Masukkan email yang valid.');
        return;
      }
      if(!(Number(rating) >=1 && Number(rating) <=5)) {
        alert('Rating harus antara 1-5.');
        return;
      }

      const reviews = JSON.parse(localStorage.getItem('reviews') || '[]');
      reviews.push({ name, email, message, rating, created: new Date().toISOString() });
      localStorage.setItem('reviews', JSON.stringify(reviews));

      // reset form
      form.reset();
      alert('Terima kasih atas ulasan Anda!');
      loadReviews();
    });
  }

  // escape utility to prevent injection when inserting HTML
  function escapeHtml(str) {
    return String(str).replace(/[&<>"'\/]/g, function (s) {
      return ({
        '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;', '/':'&#x2F;'
      })[s];
    });
  }

  loadReviews();
})();