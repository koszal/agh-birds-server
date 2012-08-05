CREATE TABLE bird (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(128) NOT NULL,
  description TEXT NULL,
  created_at DATETIME NOT NULL,
  modified_at DATETIME NULL,
  deleted_at DATETIME NULL,
  active BOOLEAN NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE bird_has_region (
  bird_id INTEGER UNSIGNED NOT NULL,
  region_id VARCHAR(8) NOT NULL,
  PRIMARY KEY(bird_id, region_id),
  INDEX bird_has_region_FKIndex1(bird_id),
  INDEX bird_has_region_FKIndex2(region_id)
);

CREATE TABLE classification (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  bird_id INTEGER UNSIGNED NOT NULL,
  order_name VARCHAR(64) NULL,
  family VARCHAR(64) NULL,
  genus VARCHAR(64) NULL,
  PRIMARY KEY(id, bird_id),
  INDEX classification_FKIndex1(bird_id)
);

CREATE TABLE region (
  id VARCHAR(8) NOT NULL,
  name VARCHAR(128) NULL,
  PRIMARY KEY(id)
);
