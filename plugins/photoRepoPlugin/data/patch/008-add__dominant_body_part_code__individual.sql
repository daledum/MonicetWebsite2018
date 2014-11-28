# To update, run this on the project root:
# mysql -u root monicet < plugins/photoRepoPlugin/data/patch/008-add__dominant_body_part_code__individual.sql
ALTER TABLE individual ADD dominant_body_part_code VARCHAR(255) default NULL after name;
