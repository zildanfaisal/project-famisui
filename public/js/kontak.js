function sendWA(phone) {
    let username = KOTAK_USER_NAME;
    let pesan = encodeURIComponent(`Halo! saya pengunjung FAMISUI`);
    let url = `https://wa.me/${phone}?text=${pesan}`;
    window.open(url, '_blank');
} 