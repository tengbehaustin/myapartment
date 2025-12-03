
    <style>
        :root{ --accent:#2b8cff; --muted:#6b7280 }
        body{ margin:0; font-family:Inter, system-ui, Arial; background:#f6f8fb; color:#111 }
        .topbar{ display:flex; gap:12px; align-items:center; padding:14px 18px; background:#fff; box-shadow:0 6px 18px rgba(10,20,40,0.06); }
        .title{ font-weight:700; font-size:18px }
        .controls{ margin-left:auto; display:flex; gap:10px; align-items:center }
        .controls select, .controls input[type=range], .controls button{ padding:8px 10px; border-radius:8px; border:1px solid #e6e9ef; background:#fff }
        #map{ height:72vh; width:100%; }
        .sidebar{ max-width:420px; width:100%; padding:18px; box-sizing:border-box }
        .layout{ display:grid; grid-template-columns: 1fr 420px; gap:20px; max-width:1200px; margin:26px auto; padding:0 18px }
        .list{ background:#fff; border-radius:12px; padding:12px; box-shadow:0 6px 20px rgba(10,20,40,0.06); max-height:64vh; overflow:auto }
        .place{ padding:10px; border-bottom:1px solid #f1f3f6 }
        .place:last-child{ border-bottom:0 }
        .place h4{ margin:0 0 6px 0; font-size:15px }
        .muted{ color:var(--muted); font-size:13px }
        .footer-note{ text-align:center; color:var(--muted); font-size:13px; margin-top:16px }
        @media (max-width:960px){ .layout{ grid-template-columns: 1fr; } .sidebar{ order:2 } }
    </style>

<div class="topbar">
    <div class="title">Places Nearby — Real-time Map</div>
    <div class="controls">
        <label class="muted">Category</label>
        <select id="categorySelect">
            <option value="amenity=restaurant">Restaurants</option>
            <option value="amenity=cafe">Cafes</option>
            <option value="amenity=bank">Banks / ATMs</option>
            <option value="amenity=pharmacy">Pharmacies</option>
            <option value="shop=supermarket">Supermarkets</option>
            <option value="leisure=park">Parks</option>
            <option value="tourism=attraction">Attractions</option>
            <option value="">All (mixed)</option>
        </select>

        <label class="muted">Radius</label>
        <input id="radius" type="range" min="200" max="3000" step="100" value="1000">
        <span id="radiusVal" class="muted">1000m</span>

        <button id="refreshBtn">Refresh</button>
    </div>
</div>

<div class="layout">
    <div>
        <div id="map"></div>
        <div class="footer-note">If your browser asks for location access, allow it to see nearby places in real-time. Fallback: Accra, Ghana.</div>
    </div>

    <aside class="sidebar">
        <div class="list" id="placesList">
            <div class="muted">No places loaded yet — allow location or click Refresh.</div>
        </div>
    </aside>

    <!-- PHOTO PREVIEW PANEL -->
    <div class="photo-panel" id="photoPanel" style="display:none; background:#fff; border-radius:12px; padding:16px; box-shadow:0 6px 20px rgba(10,20,40,0.06); margin-top:20px;">
        <h3 style="margin-top:0; font-size:18px; font-weight:600;">Place Photos</h3>
        <div id="photoGrid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(140px,1fr)); gap:12px;"></div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha512-somehash" crossorigin="">
    // Load photos for place
    function loadPhotos(place){
        const panel = document.getElementById('photoPanel');
        const grid = document.getElementById('photoGrid');
        grid.innerHTML = '';
        panel.style.display = 'block';

        // placeholder images – user will replace with real photos
        const samplePhotos = [
            'https://picsum.photos/300?random=1',
            'https://picsum.photos/300?random=2',
            'https://picsum.photos/300?random=3'
        ];

        samplePhotos.forEach(src =>{
            const img = document.createElement('img');
            img.src = src;
            img.style.width = '100%';
            img.style.height = '130px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '10px';
            grid.appendChild(img);
        });
    }

</script>
<script>
    // Fallback center: Accra, Ghana (used if user denies geolocation)
    const FALLBACK = { lat: 5.6037, lon: -0.1870 };

    const map = L.map('map', { zoomControl: true }).setView([FALLBACK.lat, FALLBACK.lon], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    const userMarker = L.marker([FALLBACK.lat, FALLBACK.lon], {title:'You (fallback)'}).addTo(map);
    let markersLayer = L.layerGroup().addTo(map);

    const radiusInput = document.getElementById('radius');
    const radiusVal = document.getElementById('radiusVal');
    const categorySelect = document.getElementById('categorySelect');
    const refreshBtn = document.getElementById('refreshBtn');
    const placesList = document.getElementById('placesList');

    radiusInput.addEventListener('input', ()=>{ radiusVal.textContent = radiusInput.value + 'm'; });
    refreshBtn.addEventListener('click', ()=> fetchNearby(currentPos, parseInt(radiusInput.value), categorySelect.value));

    let currentPos = { lat: FALLBACK.lat, lon: FALLBACK.lon };

    // try geolocation
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition((pos)=>{
            currentPos.lat = pos.coords.latitude;
            currentPos.lon = pos.coords.longitude;
            map.setView([currentPos.lat, currentPos.lon], 15);
            userMarker.setLatLng([currentPos.lat, currentPos.lon]).bindPopup('You are here').openPopup();
            fetchNearby(currentPos, parseInt(radiusInput.value), categorySelect.value);
            // watch position for realtime updates
            navigator.geolocation.watchPosition((p)=>{
                currentPos.lat = p.coords.latitude; currentPos.lon = p.coords.longitude;
                userMarker.setLatLng([currentPos.lat, currentPos.lon]);
            }, ()=>{}, { enableHighAccuracy:true, maximumAge:5000, timeout:10000 });
        }, (err)=>{
            // denied or error — use fallback and allow manual refresh
            console.warn('geolocation error', err);
            fetchNearby(currentPos, parseInt(radiusInput.value), categorySelect.value);
        }, { enableHighAccuracy:true, maximumAge:60000, timeout:10000 });
    } else {
        fetchNearby(currentPos, parseInt(radiusInput.value), categorySelect.value);
    }

    // Build Overpass QL from params: bbox around center of radius
    function buildOverpassQuery(center, radiusMeters, filter){
        // Overpass supports "around:radius" search in node/way/relation
        // We'll search nodes and ways
        let filterClause = filter ? '[' + filter + ']' : '';
        const q = `[
        out:json][timeout:25];(
          node${filterClause}(around:${radiusMeters},${center.lat},${center.lon});
          way${filterClause}(around:${radiusMeters},${center.lat},${center.lon});
          relation${filterClause}(around:${radiusMeters},${center.lat},${center.lon});
        );
        out center;`;
        return q;
    }

    async function fetchNearby(center, radiusMeters, filter){
        placesList.innerHTML = '<div class="muted">Searching nearby places…</div>';
        markersLayer.clearLayers();

        const q = buildOverpassQuery(center, radiusMeters, filter);
        const url = 'https://overpass-api.de/api/interpreter';

        try{
            const res = await fetch(url, { method:'POST', body: q });
            if(!res.ok) throw new Error('Overpass error');
            const data = await res.json();

            const items = data.elements.map(el => {
                const lat = el.lat ?? el.center?.lat;
                const lon = el.lon ?? el.center?.lon;
                const name = el.tags?.name || '(unnamed)';
                const type = Object.entries(el.tags || {}).slice(0,3).map(t=>t.join('=')).join(', ');
                const addr = ['addr:street','addr:housenumber','addr:city','addr:postcode'].map(k=>el.tags?.[k]).filter(Boolean).join(' • ');
                return { id: el.id, lat, lon, name, type, addr, tags: el.tags };
            }).filter(i => i.lat && i.lon);

            if(items.length === 0){ placesList.innerHTML = '<div class="muted">No places found in this radius.</div>'; return; }

            // Fetch walking/driving time for each item
            await Promise.all(items.map(async it => {
                const dur = await getDurations(center.lat, center.lon, it.lat, it.lon);
                it.walk = dur.walk;
                it.drive = dur.drive;
            }));

            // Sort by walking time if available, otherwise straight distance
            items.forEach(it => it.distance = it.walk || distanceMeters(center.lat, center.lon, it.lat, it.lon));
            items.sort((a,b)=>a.distance - b.distance);((a,b)=>a.distance - b.distance);

            placesList.innerHTML = '';
            items.forEach((it, idx)=>{
                const el = document.createElement('div'); el.className = 'place';
                el.innerHTML = `<h4>${escapeHtml(it.name)}</h4>
            <div class=\"muted\">🚶‍♂️ ${it.walk ? Math.round(it.walk/60)+' min walk' : '—'} • 🚗 ${it.drive ? Math.round(it.drive/60)+' min drive' : '—'}</div>` + (it.addr?`<div class=\"muted\">${escapeHtml(it.addr)}</div>`:''); + (it.addr?`<div class="muted">${escapeHtml(it.addr)}</div>`:'');
                el.addEventListener('click', ()=>{ map.setView([it.lat,it.lon],17); });
                placesList.appendChild(el);

                const marker = L.marker([it.lat,it.lon]).addTo(markersLayer);
                let popupHtml = `<strong>${escapeHtml(it.name)}</strong><br>${Math.round(it.distance)} m away<br><small class="muted">${escapeHtml(it.type)}</small>`;
                if(it.tags?.website) popupHtml += `<br><a href="${it.tags.website}" target="_blank">website</a>`;
                marker.bindPopup(popupHtml);

                // when clicking list, also open photos
                el.addEventListener('click', ()=>{
                    map.setView([it.lat,it.lon],17);
                    loadPhotos(it);
                });

                marker.on('click', ()=> loadPhotos(it));(popupHtml);
            });

        }catch(err){
            console.error(err);
            placesList.innerHTML = '<div class="muted">Failed to load places. Try again or check your connection.</div>';
        }
    }

    function escapeHtml(s){ return String(s).replace(/[&<>"]+/g, c=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;' }[c])); }

    // OSRM walking + driving duration
    async function getDurations(lat1, lon1, lat2, lon2){
        try{
            const walkUrl = `https://router.project-osrm.org/route/v1/foot/${lon1},${lat1};${lon2},${lat2}?overview=false`;
            const driveUrl = `https://router.project-osrm.org/route/v1/driving/${lon1},${lat1};${lon2},${lat2}?overview=false`;
            const [walkRes, driveRes] = await Promise.all([fetch(walkUrl), fetch(driveUrl)]);
            const walkJson = await walkRes.json();
            const driveJson = await driveRes.json();
            return {
                walk: walkJson.routes?.[0]?.duration || null,
                drive: driveJson.routes?.[0]?.duration || null
            };
        }catch(e){ return { walk:null, drive:null }; }
    }

    // Haversine distance (meters)
    function distanceMeters(lat1, lon1, lat2, lon2){
        function toRad(d){ return d*Math.PI/180; }
        const R=6371000; const dLat=toRad(lat2-lat1); const dLon=toRad(lon2-lon1);
        const a = Math.sin(dLat/2)**2 + Math.cos(toRad(lat1))*Math.cos(toRad(lat2))*Math.sin(dLon/2)**2;
        const c = 2*Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return R*c;
    }

    // initial fetch when category changed
    categorySelect.addEventListener('change', ()=> fetchNearby(currentPos, parseInt(radiusInput.value), categorySelect.value));

</script>
