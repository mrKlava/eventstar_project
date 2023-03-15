CREATE VIEW event_registrations_view
AS
SELECT R.event_id
		,COUNT(R.user_id) AS registrations
	FROM registrations AS R
    GROUP BY R.event_id
;



CREATE VIEW events_info_view
AS
SELECT E.event_id
		,E.event_name
        ,E.description
        ,E.details
        ,E.max_person
        ,ER.registrations
        ,E.event_date
        ,E.register_deadline
        ,E.age_rating
        ,L.location_name
        ,L.address
        ,C.city_name
        ,O.organizator_name
		,O.organizator_id
        ,U.name
	FROM events AS E
    INNER JOIN locations AS L
    	ON E.location_id = L.location_id
    INNER JOIN city_location AS CL
    	ON CL.location_id = E.location_id
    INNER JOIN cities AS C
    	ON CL.city_id = C.city_id
    INNER JOIN organizators AS O
    	ON E.organizator_id = O.organizator_id
    INNER JOIN users AS U
    	ON O.user_id = U.user_id
    INNER JOIN event_registrations_view AS ER
    	ON ER.event_id = E.event_id
;