DELETE t1 FROM gs_an_table t1
INNER JOIN gs_an_table t2 
WHERE 
    t1.id > t2.id AND 
    t1.name = t2.name AND 
    t1.email = t2.email AND
    t1.eco_bag = t2.eco_bag AND
    t1.my_bottle = t2.my_bottle AND
    t1.walking_bike = t2.walking_bike AND
    t1.power_bike = t2.power_bike;
