SELECT *
FROM etudiants
-- CURDATE() : donne la date du jour.
-- DATE_SUB(CURDATE(), INTERVAL 18 YEAR) : calculer la date d’il y a 18 ans
-- naissance <= ... : sélectionne les étudiants nés il y a 18 ans ou plus, donc ayant plus de 18 ans.
WHERE naissance > DATE_SUB(CURDATE(), INTERVAL 18 YEAR);
