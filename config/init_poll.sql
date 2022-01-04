CREATE DATABASE marionraudsepp_poll COLLATE utf8mb4_estonian_ci;

USE marionraudsepp_poll;

CREATE TABLE `questions` (
  `poll_id` int(20) NOT NULL,
  `question` text NOT NULL,
  `poll_day`date,
  `date` TIMESTAMP

);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`poll_id`);

ALTER TABLE `questions`
  MODIFY `poll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1; 


CREATE TABLE `options` (
  `option_id` int(20) NOT NULL,
  `poll_id` int(20) NOT NULL,
  `option_text` varchar(255),
  `option_vote` int(20) NOT NULL DEFAULT 0,
  `date` TIMESTAMP
);
 
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

ALTER TABLE `options`
  MODIFY `option_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;