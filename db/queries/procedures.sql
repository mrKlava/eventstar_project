-- UPDATE EVENT

DELIMITER $$
CREATE PROCEDURE PR_event_update(
	IN `EVENT_ID`             INT,
  IN `EVENT_NAME`           VARCHAR(128),
	IN `DESCRIPTION`          TEXT,
	IN `PERS_MAX`             INT,
	IN `REGISTRER_DEADLINE`   DATE,
	IN `EVENT_DATE`           DATETIME,
	IN `AGE_LIMIT`            INT,
	IN `LOCATION_ID`          INT,
	IN `ORGANIZATOR_ID`       INT
)
BEGIN
UPDATE events SET 
	event_name 			    = EVENT_NAME 
	,description 		    = DESCRIPTION
	,pers_max			      = PERS_MAX
	,date				        = EVENT_DATE
	,register_deadline  = REGISTER_DEADLINE
	,age_limit			    = AGE_LIMIT
	,location_id		    = LOCATION_ID
	,organizator_id		  = ORGANIZATOR_ID
WHERE event_id        = EVENT_ID;
END $$
DELIMITER ;