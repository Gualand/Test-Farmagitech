const timeInWord = (h, m) => {
  const wordArray = [
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine",
    "ten",
    "eleven",
    "twelve",
    "thirteen",
    "fourteen",
    "fifteen",
    "sixteen",
    "seventeen",
    "eightteen",
    "nineteen",
    "twenty",
    "twenty one",
    "twenty two",
    "twenty three",
    "twenty four",
    "twenty five",
    "twenty six",
    "twenty seven",
    "twenty eight",
    "twenty nine",
  ];

  const hour = wordArray[h - 1];
  if (m === 0) {
    return `${hour} o' clock`;
  } else if (m === 30) {
    return `half past ${hour}`;
  } else if (m === 15) {
    return `quarter past ${hour}`;
  } else if (m === 45) {
    const hour = wordArray[h];
    return `quarter to ${hour}`;
  } else if (m === 1) {
    return `${wordArray[m - 1]} minute past ${hour}`;
  } else if (m < 30) {
    return `${wordArray[m - 1]} minutes past ${hour}`;
  } else {
    const hour = wordArray[h];
    return `${wordArray[59 - m]} minutes to ${hour}`;
  }
};

console.log(timeInWord(1, 1));
