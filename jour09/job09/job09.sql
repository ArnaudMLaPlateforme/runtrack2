SELECT *
FROM etudiants
-- CURDATE() : donne la date du jour.
-- DATE_SUB(CURDATE(), INTERVAL 18 YEAR) : calculer la date d’il y a 18 ans
-- naissance > ... : sélectionner les étudiants nés après cette date
WHERE naissance > DATE_SUB(CURDATE(), INTERVAL 18 YEAR);
