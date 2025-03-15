// Verifica se a linguagem é RTL usando a API Intl
function isRtlLanguage(languageCode) {
    try {
        const locale = new Intl.Locale(languageCode);
        const direction = new Intl.DisplayNames([locale.baseName], { type: 'region' }).resolvedOptions().textInfo.direction;
        return direction === 'rtl';
    } catch (e) {
        // Fallback para solução manual
        const rtlLangs = ['ar', 'fa', 'he', 'ur', 'yi', 'dv', 'ps', 'sd', 'ug', 'ku'];
        return rtlLangs.includes(languageCode.substring(0, 2).toLowerCase());
    }
}

// Apply RTL class if needed
document.addEventListener('DOMContentLoaded', function() {
    const htmlLang = document.documentElement.lang;
    if (htmlLang && isRtlLanguage(htmlLang)) {
        document.documentElement.classList.add('rtl');
    }
});