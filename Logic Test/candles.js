const birthdayCakeCandles = (candles) => {
  const max = Math.max(...candles);
  const totalMax = candles.filter((e) => e === max);
  return totalMax.length;
};

const candles = [4, 4, 3, 2];

console.log(birthdayCakeCandles(candles));
