function filmGetir() {
    const film = document.getElementById("filmAdi").value.trim();
    const sonucDiv = document.getElementById("filmSonuc");

    // Boş aramayı engelle
    if (!film) {
        sonucDiv.innerHTML = "Lütfen bir film adı yazın.";
        return;
    }

    // API_KEY_BURAYA yazan yere e-postadaki kodu yapıştırın (tırnaklara dokunmayın)
    const apiKey = "803d5798"; 
    const url = `https://www.omdbapi.com/?t=${encodeURIComponent(film)}&apikey=${apiKey}`;

    fetch(url)
    .then(res => res.json())
    .then(data => {
        if (data.Response === "False") {
            sonucDiv.innerHTML = `"${film}" bulunamadı. Lütfen İngilizce adını deneyin (Örn: Inception).`;
            return;
        }

        sonucDiv.innerHTML = `
            <div class="film-card" style="border: 1px solid #3498db; padding: 15px; border-radius: 10px; background: white; margin-top: 20px;">
                <h3 style="color: #2c3e50;">${data.Title} (${data.Year})</h3>
                <img src="${data.Poster !== 'N/A' ? data.Poster : 'https://via.placeholder.com/200x300?text=Afiş+Yok'}" style="width: 100%; max-width: 200px; border-radius: 5px;">
                <p><strong>Konu:</strong> ${data.Plot}</p>
                <p><strong>IMDb Puanı:</strong> ⭐ ${data.imdbRating}</p>
            </div>
        `;
    })
    .catch(err => {
        sonucDiv.innerHTML = "Bir hata oluştu, internetinizi kontrol edin.";
        console.error("Hata detayı:", err);
    });
}