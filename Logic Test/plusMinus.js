const plusMinus = (arr) => {
  const minus = arr.filter((e) => e < 0);
  const zero = arr.filter((e) => e == 0);
  const plus = arr.filter((e) => e > 0);

  const negatifRatio = (minus.length / arr.length).toFixed(6);
  const zeroRatio = (zero.length / arr.length).toFixed(6);
  const positifRatio = (plus.length / arr.length).toFixed(6);

  return [negatifRatio, zeroRatio, positifRatio];
};

const array = [-4, 3, -9, 0, 4, 1];

console.log(plusMinus(array));
