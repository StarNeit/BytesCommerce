SELECT 
    M1.visit_date,
    ROUND(AVG(M2.fee_paid), 2) AS average_fee
FROM 
    Membership M1
JOIN 
    Membership M2 ON M2.visit_date BETWEEN DATE_SUB(M1.visit_date, INTERVAL 6 DAY) AND M1.visit_date
GROUP BY 
    M1.visit_date
ORDER BY 
    M1.visit_date ASC;