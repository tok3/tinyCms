// Import QualWeb using ES module syntax
import { QualWeb } from '@qualweb/core';

(async () => {
  const qualweb = new QualWeb();

  try {
    await qualweb.start();

    // Evaluate a single URL
    const result = await qualweb.evaluate({ url: 'https://example.com' });

    console.log('Evaluation result:', JSON.stringify(result, null, 2));
    await qualweb.stop();
  } catch (error) {
    console.error('Error evaluating URL:', error.message);
  }
})();
