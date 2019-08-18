package com.kalessil.phpStorm.phpInspectionsEA.security;

import com.kalessil.phpStorm.phpInspectionsEA.PhpCodeInsightFixtureTestCase;
import com.kalessil.phpStorm.phpInspectionsEA.inspectors.security.HardcodedCredentialsInspector;

final public class HardcodedCredentialsInspectorTest extends PhpCodeInsightFixtureTestCase {
    public void testIfFindsAllPatterns() {
        myFixture.enableInspections(new HardcodedCredentialsInspector());
        myFixture.configureByFile("testData/fixtures/security/hardcoded-credentials.php");
        myFixture.testHighlighting(true, false, true);
    }
}
