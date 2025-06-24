@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            overflow: hidden;
            /* opsional, biar tidak scroll ke bawah */
        }

        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }

        .custom-navbar {
            background-color: #26323d;
            /* Ganti warna sesuai keinginan */
            padding-top: 1px;
            /* kurangi padding atas */
            padding-bottom: 1px;
            /* kurangi padding bawah */
            min-height: 5px;
            /* kecilkan tinggi minimum navbar */
        }

        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link,
        .custom-navbar .dropdown-toggle,
        .custom-navbar .dropdown-item {
            color: white !important;
        }

        .custom-navbar .nav-link:hover,
        .custom-navbar .dropdown-item:hover {
            color: #ffdd57 !important;
            /* Hover efek kuning */
        }

        .custom-navbar .dropdown-menu {
            background-color: #003366;
            /* Warna dropdown menu */
        }

        .custom-navbar .dropdown-item {
            color: white;
        }

        .custom-navbar .dropdown-item:hover {
            background-color: #002244;
            /* Hover dropdown item */
        }

        .modern-popup {
            font-family: 'Segoe UI', sans-serif;
            max-width: 300px;
            color: #333;
        }

        .modern-popup h5 {
            font-size: 18px;
            font-weight: 600;
            color: #003366;
            margin-bottom: 5px;
        }

        .modern-popup .category-badge {
            background-color: #00b894;
            color: white;
            font-size: 12px;
            padding: 2px 12px;
            border-radius: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .modern-popup img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
        }

        .modern-popup .info-meta {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .leaflet-popup-content-wrapper {
            animation: fadeIn 0.3s ease-in-out;
            padding: 10px;
            border-radius: 10px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Styling khusus untuk Point Modal agar sesuai tema Event Modal */
        .point-modal .modal-content {
            background: linear-gradient(135deg, #384d66, #497093);
            color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 51, 102, 0.5);
        }

        .point-modal .modal-header {
            background-color: rgba(255, 255, 255, 0.1);
            border-bottom: none;
        }

        .point-modal .modal-header .modal-title {
            font-size: 20px;
            font-weight: bold;
            color: #ffdd57;
        }

        .point-modal .modal-body {
            font-size: 15px;
            color: #e8f3ff;
        }

        .point-modal .modal-footer .btn-secondary {
            background-color: #006080;
            border: none;
            color: #ffffff;
        }

        .point-modal .modal-footer .btn-secondary:hover {
            background-color: #004d66;
        }

        .point-modal .btn-close {
            filter: invert(1);
        }

        .point-modal.fade .modal-dialog {
            transform: translateY(-30px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .point-modal.show .modal-dialog {
            transform: translateY(0);
            opacity: 1;
        }

        /* Search Box berada di pojok kanan atas */
        .search-box {
            position: absolute;
            top: 66px;
            /* Sekarang berada di bawah navbar */
            right: 10px;
            z-index: 1001;
            background-color: #ffffff;
            padding: 4px;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.25);
        }

        .search-box .form-control {
            box-shadow: none;
        }

        .search-box .input-group-text {
            font-size: 1rem;
        }

        #searchResults {
            position: absolute;
            top: 100%;
            /* Tepat di bawah search box */
            left: 0;
            right: 0;
            z-index: 1002;
            max-height: 180px;
            overflow-y: auto;
        }

        #searchResults .list-group-item {
            cursor: pointer;
        }

        #searchResults .list-group-item:hover {
            background-color: #f1f1f1;
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- SEARCH BOX Pariwisata Magelang -->
    <div class="search-box rounded-3 shadow-sm">
        <div class="input-group">
            <span class="input-group-text bg-white border-0">
                <i class="fa-solid fa-magnifying-glass text-primary"></i>
            </span>
            <input id="searchPariwisata" type="text" class="form-control border-0" placeholder="Cari tempat wisata...">
        </div>
        <ul id="searchResults" class="list-group mt-1 rounded-3 shadow-sm" style="display: none;"></ul>
    </div>

    <!-- Modal Create Point -->
    <div class="modal fade point-modal" id="createpointModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-location-dot"></i> Create
                        Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Point name">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Enter Category (e.g., Museum, Hotel)">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_point" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom_point" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form_control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-point" class="img-thumbnail mt-2"
                                width="400">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="fa-solid fa-times"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <script>
        var map = L.map('map').setView([-7.47708, 110.21825], 13);

        // Tambahkan beberapa pilihan basemap
        var baseLayers = {
            "OpenStreetMap": L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }),

            "OpenTopoMap": L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
                maxZoom: 17,
                attribution: 'Map data: &copy; OpenStreetMap contributors, SRTM | Map style: &copy; OpenTopoMap (CC-BY-SA)'
            }),

            "Esri World Imagery": L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri'
                }
            ),

            "Esri World Street Map": L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri'
                }
            )
        };

        // Aktifkan salah satu basemap default
        baseLayers["OpenStreetMap"].addTo(map);

        // Tambahkan layer WMS dari GeoServer - Sebaran Magelang (dengan transparansi)
        var batasDesaLayer = L.tileLayer.wms("http://localhost:8080/geoserver/pariwisata/wms", {
            layers: 'pariwisata:Magelang', // workspace:nama_layer
            styles: '',
            format: 'image/png',
            transparent: true,
            opacity: 0.5, // tingkat transparansi: 0.0 (paling transparan) sampai 1.0 (penuh)
            attribution: '© Peta Sebaran Magelang',
            zIndex: 300
        })

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: false,
                polygon: false,
                rectangle: false,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();

            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            console.log(objectGeometry);

            if (type === 'polyline') {
                console.log("Create " + type);

                $('#geom_polyline').val(objectGeometry);

                //memunculkan modal untuk create polyline
                $('#createpolylineModal').modal('show');
            } else if (type === 'polygon' || type === 'rectangle') {
                console.log("Create " + type);

                $('#geom_polygon').val(objectGeometry);

                //memunculkan modal untuk create polygon
                $('#createpolygonModal').modal('show');
            } else if (type === 'marker') {
                console.log("Create " + type);

                $('#geom_point').val(objectGeometry);

                //memunculkan modal untuk create marker
                $('#createpointModal').modal('show');
            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        /* GeoJSON Point */
        var points = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routeEdit = "{{ route('points.edit', ':id') }}";
                routeEdit = routeEdit.replace(':id', feature.properties.id);

                var popupContent =
                    `<div class="modern-popup">
        <h5>${feature.properties.name}</h5>
        <div class="category-badge">${feature.properties.category}</div>
        <img src="{{ asset('storage/images') }}/${feature.properties.image}" alt="Image">
        <p>${feature.properties.description}</p>
        <p class="info-meta"><strong>Alamat:</strong> ${feature.properties.address}</p>
        <p class="info-meta">Dibuat: ${feature.properties.created_at}</p>

        <div class="row mt-3">
            <div class="col-6 text-end">
                <a href="${routeEdit}" class="btn btn-warning btn-sm">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </div>
            <div class="col-6">
                <form method="POST" action="{{ url('points') }}/${feature.properties.id}">
                    {{ csrf_field() }} @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin akan dihapus?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

        <p class="info-meta mt-2">Dibuat oleh: ${feature.properties.user_created}</p>
    </div>`;

                layer.on({
                    click: function(e) {
                        points.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        points.bindTooltip(feature.properties.kab_kota);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            points.addData(data);
            map.addLayer(points);

            $.getJSON("{{ route('api.points') }}", function(data) {
                points.addData(data);
                map.addLayer(points);

                // =================================================
                // SEARCH FUNCTION UNTUK POINTS PARIWISATA MAGELANG
                // =================================================
                var pointsLayers = []; // Array untuk menampung semua point dari data points
                data.features.forEach(feature => {
                    var lat = feature.geometry.coordinates[1];
                    var lng = feature.geometry.coordinates[0];
                    var pointLayer = L.marker([lat, lng]);
                    pointLayer.feature = feature;
                    pointsLayers.push(pointLayer);
                });

                const searchInput = document.getElementById('searchPariwisata');
                const searchResults = document.getElementById('searchResults');

                searchInput.addEventListener('input', function() {
                    const keyword = this.value.toLowerCase().trim();
                    searchResults.innerHTML = '';

                    if (keyword.length === 0) {
                        searchResults.style.display = 'none';
                        return;
                    }

                    const matches = pointsLayers.filter(layer => {
                        return layer.feature.properties.name.toLowerCase().includes(
                            keyword);
                    });

                    if (matches.length > 0) {
                        matches.forEach(layer => {
                            const li = document.createElement('li');
                            li.className = 'list-group-item list-group-item-action';
                            li.textContent = layer.feature.properties.name;

                            li.addEventListener('click', () => {
                                map.setView(layer.getLatLng(), 17);
                                layer.openPopup();
                                searchResults.style.display = 'none';
                                searchInput.value = '';
                            });
                            searchResults.appendChild(li);
                        });
                        searchResults.style.display = 'block';
                    } else {
                        const li = document.createElement('li');
                        li.className = 'list-group-item text-muted';
                        li.textContent = 'Tidak ditemukan';
                        searchResults.appendChild(li);
                        searchResults.style.display = 'block';
                    }
                });
            });
        });

        // Control Layer
        var overlayMaps = {
            "Points": points,
            "Batas Kecamatan": batasDesaLayer
            // "Polylines": polylines,
            // "Polygons": polygons,
        };

        var controllayer = L.control.layers(baseLayers, overlayMaps, {
            collapsed: true, // biar tetap dalam bentuk ikon
            position: 'topleft' // tetap berada di pojok kanan atas
        });
        controllayer.addTo(map);
    </script>
@endsection

</html>
