// import * as THREE from 'https://unpkg.com/three@0.160.0/build/three.module.js';
// import { GLTFLoader } from 'https://unpkg.com/three@0.160.0/examples/jsm/loaders/GLTFLoader.js';


// // Ajout de la scène, du moteur de rendun puis de la caméra
// const scene = new THREE.Scene();
// const renderer = new THREE.WebGLRenderer({ alpha: true }); // ici j'ai ajouté l'alpha car le fond est transparent
// const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);

// // Charger le modèle GLB
// const loader = new GLTFLoader();

// // Si tes textures sont dans "texture/" à la racine, le .glb les référence souvent par chemin relatif.
// // Tu peux définir un chemin de base (optionnel) :
// loader.setPath(''); // ou 'texture/' selon comment le .glb référence les JPG

// loader.load(
//     '3D/source/model.glb',
//     (gltf) => {
//         const key = gltf.scene;
//         scene.add(key);

//         // Optionnel : centrer et adapter la taille (à ajuster selon ta clé)
//         const box = new THREE.Box3().setFromObject(key);
//         const center = box.getCenter(new THREE.Vector3());
//         const size = box.getSize(new THREE.Vector3());
//         key.position.sub(center);
//         const maxDim = Math.max(size.x, size.y, size.z);
//         const scale = 15 / maxDim; // pour avoir une taille proche de l’ancien torus
//         key.scale.setScalar(scale);

//         // Garder une ref pour faire tourner la clé dans animate()
//         window.keyModel = key;
//     },
//     (progress) => console.log('Chargement', progress),
//     (err) => console.error('Erreur chargement GLB', err)
// );

// // Position de la cam
// camera.position.z = 30

// // Mettre le rendu du moteur de rendu en plein écran et l’ajouter dans la page HTML via le canvas HTML5 !
// renderer.setSize(window.innerWidth, window.innerHeight);
// document.body.appendChild(renderer.domElement);

// // Définir la fonction finale
// function animate() {
//   if (window.keyModel) {
//     window.keyModel.rotation.x += 0.01;
//     window.keyModel.rotation.y += 0.01;
//   }
//   renderer.render(scene, camera);
//   requestAnimationFrame(animate);
// }
// animate();