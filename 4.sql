SELECT 
    U.firstName, 
    U.lastName, 
    L.city, 
    L.country
FROM 
    Users U
LEFT JOIN 
    Locations L
ON 
    U.userId = L.userId;
