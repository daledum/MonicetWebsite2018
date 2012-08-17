ALTER TABLE observation_photo_tail ADD is_cutted_point_left TINYINT default 0 after is_irregular;
ALTER TABLE observation_photo_tail ADD is_cutted_point_right TINYINT default 0 after is_cutted_point_left;
ALTER TABLE observation_photo_dorsal_left ADD is_cutted_point TINYINT default 0 after is_irregular;
ALTER TABLE observation_photo_dorsal_right ADD is_cutted_point TINYINT default 0 after is_irregular;
