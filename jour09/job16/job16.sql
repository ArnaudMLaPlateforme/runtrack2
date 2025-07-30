SELECT etage.nom AS nom_etage, salles.nom AS "Biggest Room", salles.capacite
FROM salles
-- Joindre les tables salles et etage via id_etage et id.
JOIN etage ON salles.id_etage = etage.id
WHERE salles.capacite = (
    -- Filtrer pour ne garder que la salle avec la capacité maximale 
    SELECT MAX(capacite) FROM salles
);
