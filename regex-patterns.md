--name pattern--
valid characters: starts with a letter A-Z
                  then optional space, dash, or apostraphy, and one or more letter a-zA-Z
                  must end with letter
^[A-Z]([ \-']?[a-zA-Z]+)*$

--address pattern--
valid characters: starts with letter A-Z or number (any amount of each)
                  then optional space, dash, period or apostrophy
                  OR option period followed by space 
                  then at least one more letter a-z or A-Z or number 0-9
                  can end with a period
^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$

--phone pattern--
valid characters: starts with a number 2-9
                  then two numbers in range 0-9
                  dash followed by a number 2-9
                  then two numbers in range 0-9
                  dash followed by four numbers in range 0-9
                  must end with number
^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$

--prefix/suffix pattern--
valid characters: starts with a capitial letter A-Z
                  followed by optional space or period
                  OR optional comma followed by space
                  OR optional period followed by space
                  then at least one letter a-z A-Z
                  can end with a period
^[A-Z](([ \.]|(\, )|(\. ))?[a-zA-Z]+)*\.?$

--D.O.B. pattern--
valid characters: starts with 0 then a number 1-9
                  OR 1 followed by a number 0-2
                  dash
                  0 followed by number 1-9
                  OR a number 1-2 followed by a number 0-9
                  dash
                  a number 1-9 followed by three numbers 0-9
                  must end with number
^((0[1-9])|(1[0-2]))\/((0[1-9])|([1-2][0-9])|(3[0-1]))\/[1-9][0-9]{3}$

--Ethnicity pattern--
valid characters: starts with capital letter
                  optional space, dash OR comma followed by a space
                  at least one letter a-zA-Z
                  must end with a letter
^[A-Z](([ \-|(\, )])?[a-zA-Z]+)*$

--Apt/Suite pattern--
valid characters: starts with letter a-zA-Z or number 0-9
                  if there is a space, dash, period OR period followed by space
                     there must be at least one letter a-zA-Z or number 0-9
                  must end with a letter a-zA-Z or number
^[a-zA-Z0-9]+(([\- \.]|(\. ))[a-zA-Z0-9]+)*$

--City pattern--
valid characters: starts with capital letter A-Z
                  optional space, dash, comma, period, apostrophy
                  OR period follow by a space
                  OR comma followed by a space
                  at least one letter a-zA-Z
                  can end with a period
^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$

--Zip Code pattern--
valid characters: starts with five letters 0-9
                  optional dash followed by four numbers 0-9
                  must end with number
^[0-9]{5}(-[0-9]{4})?$

--Email Address pattern--
valid characters: does not start with a period
                  at least one character
                  @
                  at least one character
                  .
                  must end with two to five characters 
^(?!\.).+@.+\..{2,5}$

Relationshipt to Student pattern:
<Do we need this?>
