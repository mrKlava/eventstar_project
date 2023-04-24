CREATE VIEW VIEW_event_registration_count
AS
SELECT R.event_id
		,COUNT(R.user_id) AS registrations
	FROM registrations AS R
    GROUP BY R.event_id
;



CREATE VIEW VIEW_events_list
AS
SELECT E.event_id
        ,E.event_name
        ,E.description
        ,E.details
        ,EI.image_id
        ,I.src
        ,E.person_max
        ,ER.registrations
        ,E.event_date
        ,E.register_deadline
        ,E.age_rating
        ,L.location_id
        ,L.location_name
        ,L.address
        ,L.location_lat
        ,L.location_long
        ,C.city_name
        ,O.organizator_name
		,O.organizator_id
        ,U.name
	FROM events AS E
    LEFT JOIN locations AS L
    	ON E.location_id = L.location_id
    LEFT JOIN city_location AS CL
    	ON CL.location_id = E.location_id
    LEFT JOIN cities AS C
    	ON CL.city_id = C.city_id
    LEFT JOIN organizators AS O
    	ON E.organizator_id = O.organizator_id
    LEFT JOIN users AS U
    	ON O.user_id = U.user_id
    LEFT JOIN VIEW_event_registration_count AS ER
    	ON ER.event_id = E.event_id
    LEFT JOIN event_image AS EI
    	ON E.event_id = EI.event_id
    LEFT JOIN images AS I
    	ON EI.image_id = I.image_id
;



CREATE VIEW VIEW_locations_list
AS
SELECT CL.location_id
		,L.location_name
        ,L.description
        ,L.capacity
        ,CL.city_id
        ,C.city_name
        ,L.address
        ,L.location_lat
        ,L.location_long
	FROM city_location AS CL
	INNER JOIN cities AS C
		ON CL.city_id = C.city_id
	INNER JOIN locations AS L
		on L.location_id = CL.location_id
;



CREATE VIEW VIEW_event_registrations
AS
SELECT R.event_id
		,U.user_id
        ,U.name
        ,U.surname
        ,U.email
		,R.registration_date
	FROM registrations AS R
    INNER JOIN users AS U
    	ON R.user_id = U.user_id
;