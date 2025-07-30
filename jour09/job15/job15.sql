SELECT salles.nom AS nom_salle, etage.nom AS nom_etage
FROM salles
-- Effectuer une jointure interne entre la table salles et la table etage, 
-- en reliant la clé étrangère salles.etage à la clé primaire etage.id.
JOIN etage ON salles.id_etage = etage.id;
