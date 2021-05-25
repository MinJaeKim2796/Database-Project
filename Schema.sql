-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema KBO
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema KBO
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `KBO` DEFAULT CHARACTER SET utf8 ;
USE `KBO` ;

-- -----------------------------------------------------
-- Table `KBO`.`Team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`Team` (
  `TeamName` VARCHAR(15) NOT NULL,
  `Stadium` VARCHAR(45) NULL,
  PRIMARY KEY (`TeamName`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`Agency`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`Agency` (
  `AgencyID` INT NOT NULL,
  `AgencyName` VARCHAR(45) NULL,
  `Agent` VARCHAR(15) NULL,
  PRIMARY KEY (`AgencyID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`Player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`Player` (
  `PlayerID` VARCHAR(15) NOT NULL,
  `Name` VARCHAR(45) NULL,
  `Team` VARCHAR(15) NOT NULL,
  `Position` VARCHAR(10) NULL,
  `PitchType` VARCHAR(15) NULL,
  `BatType` VARCHAR(15) NULL,
  `League` INT NULL,
  `Payment` INT NULL DEFAULT 0,
  `Salary` INT NULL DEFAULT 0,
  `DebutYear` INT NULL,
  `DebutTeam` VARCHAR(45) NULL,
  `AgencyID` INT NULL,
  PRIMARY KEY (`PlayerID`),
  INDEX `AgencyID_idx` (`AgencyID` ASC) VISIBLE,
  INDEX `TeamName_idx` (`Team` ASC) VISIBLE,
  CONSTRAINT `AgencyID`
    FOREIGN KEY (`AgencyID`)
    REFERENCES `KBO`.`Agency` (`AgencyID`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `TeamName`
    FOREIGN KEY (`Team`)
    REFERENCES `KBO`.`Team` (`TeamName`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`Batter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`Batter` (
  `ID` VARCHAR(15) NOT NULL,
  `WAR` FLOAT NULL,
  `G` INT NULL,
  `OPS` FLOAT NULL,
  `wOBA` FLOAT NULL,
  `wRC+` FLOAT NULL,
  `WPA` FLOAT NULL,
  `BB/K` FLOAT NULL,
  `IsoP` FLOAT NULL,
  `IsoD` FLOAT NULL,
  `BABIP` FLOAT NULL,
  `Spd` FLOAT NULL,
  `pLI` FLOAT NULL,
  `Clutch` FLOAT NULL,
  `P/PA` FLOAT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `BatterID`
    FOREIGN KEY (`ID`)
    REFERENCES `KBO`.`Player` (`PlayerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`Pitcher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`Pitcher` (
  `ID` VARCHAR(15) NOT NULL,
  `WAR` FLOAT NULL,
  `ERA` FLOAT NULL,
  `WHIP` FLOAT NULL,
  `WPA` FLOAT NULL,
  `K-BB%` FLOAT NULL,
  `BABIP` FLOAT NULL,
  `LOB%` FLOAT NULL,
  `IP/G` FLOAT NULL,
  `P/PA` FLOAT NULL,
  `RAA` FLOAT NULL,
  `RAR` FLOAT NULL,
  `WAA` FLOAT NULL,
  `FastballPV` FLOAT NULL,
  `SliderPV` FLOAT NULL,
  `CurvePV` FLOAT NULL,
  `ChangeUpPV` FLOAT NULL,
  `SplitterPV` FLOAT NULL,
  `SinkerPV` FLOAT NULL,
  `KnucklePV` FLOAT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `PitcherID`
    FOREIGN KEY (`ID`)
    REFERENCES `KBO`.`Player` (`PlayerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`AllstarPlayer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`AllstarPlayer` (
  `ID` VARCHAR(15) NOT NULL,
  `PlayerID` VARCHAR(15) NULL,
  `AllstarYear` INT NULL,
  `AllstarTeam` VARCHAR(10) NULL,
  `AllstarPos` VARCHAR(10) NULL,
  PRIMARY KEY (`ID`),
  INDEX `AllstarID_idx` (`PlayerID` ASC) VISIBLE,
  CONSTRAINT `AllstarID`
    FOREIGN KEY (`PlayerID`)
    REFERENCES `KBO`.`Player` (`PlayerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`AwardList`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`AwardList` (
  `AwardNo` INT NOT NULL,
  `AwardName` VARCHAR(45) NULL,
  `AwardPos` VARCHAR(45) NULL,
  PRIMARY KEY (`AwardNo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `KBO`.`AwardPlayer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `KBO`.`AwardPlayer` (
  `ID` INT NOT NULL,
  `PlayerID` VARCHAR(15) NULL,
  `AwardYear` INT NULL,
  `AwardNo` INT NULL,
  PRIMARY KEY (`ID`),
  INDEX `AwardID_idx` (`PlayerID` ASC) VISIBLE,
  INDEX `AwardNum_idx` (`AwardNo` ASC) VISIBLE,
  CONSTRAINT `AwardID`
    FOREIGN KEY (`PlayerID`)
    REFERENCES `KBO`.`Player` (`PlayerID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `AwardNum`
    FOREIGN KEY (`AwardNo`)
    REFERENCES `KBO`.`AwardList` (`AwardNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
