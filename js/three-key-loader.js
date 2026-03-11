/**
 * Charge la scène 3D (clé) uniquement sur desktop/tablette (≥769px).
 * Sur mobile, Three.js n'est pas chargé pour de meilleures performances.
 */
if (window.matchMedia('(min-width: 769px)').matches) {
    import('./three-key.js');
}
