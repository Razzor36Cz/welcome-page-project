import React, { createContext, useContext, useState, ReactNode } from 'react';

export type Language = 'EN' | 'FR' | 'DE' | 'CZ' | 'PL';

type Translations = {
  [key: string]: {
    EN: string;
    FR: string;
    DE: string;
    CZ: string;
    PL: string;
  };
};

const translations: Translations = {
  enter: {
    EN: 'Enter',
    FR: 'Entrer',
    DE: 'Eintreten',
    CZ: 'Vstoupit',
    PL: 'Wejść',
  },
  aboutMe: {
    EN: 'About Me',
    FR: 'À Propos',
    DE: 'Über Mich',
    CZ: 'O Mně',
    PL: 'O Mnie',
  },
  videoGallery: {
    EN: 'Video Gallery',
    FR: 'Galerie Vidéo',
    DE: 'Videogalerie',
    CZ: 'Videogalerie',
    PL: 'Galeria Wideo',
  },
  music: {
    EN: 'Music',
    FR: 'Musique',
    DE: 'Musik',
    CZ: 'Hudba',
    PL: 'Muzyka',
  },
  prompt: {
    EN: 'Prompt',
    FR: 'Prompt',
    DE: 'Prompt',
    CZ: 'Prompt',
    PL: 'Prompt',
  },
  welcome: {
    EN: 'Welcome',
    FR: 'Bienvenue',
    DE: 'Willkommen',
    CZ: 'Vítejte',
    PL: 'Witamy',
  },
  biography: {
    EN: 'Biography',
    FR: 'Biographie',
    DE: 'Biografie',
    CZ: 'Biografie',
    PL: 'Biografia',
  },
  biographyText: {
    EN: 'A passionate creative professional dedicated to crafting unique visual experiences. With years of expertise in video production and digital artistry, I bring stories to life through compelling imagery and sound.',
    FR: "Un professionnel créatif passionné dédié à la création d'expériences visuelles uniques. Avec des années d'expertise en production vidéo et en art numérique, je donne vie aux histoires à travers des images et des sons captivants.",
    DE: 'Ein leidenschaftlicher Kreativprofi, der sich der Gestaltung einzigartiger visueller Erlebnisse widmet. Mit jahrelanger Expertise in Videoproduktion und digitaler Kunst erwecke ich Geschichten durch überzeugende Bilder und Klänge zum Leben.',
    CZ: 'Vášnivý kreativní profesionál oddaný tvorbě jedinečných vizuálních zážitků. S mnohaletými zkušenostmi ve video produkci a digitálním umění přivádím příběhy k životu prostřednictvím působivých obrazů a zvuků.',
    PL: 'Pasjonat kreatywności oddany tworzeniu wyjątkowych doświadczeń wizualnych. Z wieloletnim doświadczeniem w produkcji wideo i sztuce cyfrowej ożywiam historie poprzez przekonujące obrazy i dźwięki.',
  },
  skills: {
    EN: 'Skills',
    FR: 'Compétences',
    DE: 'Fähigkeiten',
    CZ: 'Dovednosti',
    PL: 'Umiejętności',
  },
  contact: {
    EN: 'Contact',
    FR: 'Contact',
    DE: 'Kontakt',
    CZ: 'Kontakt',
    PL: 'Kontakt',
  },
  latestWorks: {
    EN: 'Latest Works',
    FR: 'Dernières Œuvres',
    DE: 'Neueste Arbeiten',
    CZ: 'Nejnovější Práce',
    PL: 'Najnowsze Prace',
  },
  featuredTracks: {
    EN: 'Featured Tracks',
    FR: 'Morceaux en Vedette',
    DE: 'Ausgewählte Tracks',
    CZ: 'Vybrané Skladby',
    PL: 'Polecane Utwory',
  },
  creativePrompts: {
    EN: 'Creative Prompts',
    FR: 'Prompts Créatifs',
    DE: 'Kreative Prompts',
    CZ: 'Kreativní Prompty',
    PL: 'Kreatywne Prompty',
  },
  adminLogin: {
    EN: 'Admin Login',
    FR: 'Connexion Admin',
    DE: 'Admin-Anmeldung',
    CZ: 'Přihlášení Admin',
    PL: 'Logowanie Admin',
  },
  password: {
    EN: 'Password',
    FR: 'Mot de passe',
    DE: 'Passwort',
    CZ: 'Heslo',
    PL: 'Hasło',
  },
  login: {
    EN: 'Login',
    FR: 'Connexion',
    DE: 'Anmelden',
    CZ: 'Přihlásit',
    PL: 'Zaloguj',
  },
  logout: {
    EN: 'Logout',
    FR: 'Déconnexion',
    DE: 'Abmelden',
    CZ: 'Odhlásit',
    PL: 'Wyloguj',
  },
  adminPanel: {
    EN: 'Admin Panel',
    FR: 'Panneau Admin',
    DE: 'Admin-Panel',
    CZ: 'Admin Panel',
    PL: 'Panel Admin',
  },
};

interface LanguageContextType {
  language: Language;
  setLanguage: (lang: Language) => void;
  t: (key: string) => string;
}

const LanguageContext = createContext<LanguageContextType | undefined>(undefined);

export const LanguageProvider = ({ children }: { children: ReactNode }) => {
  const [language, setLanguage] = useState<Language>('EN');

  const t = (key: string): string => {
    return translations[key]?.[language] || key;
  };

  return (
    <LanguageContext.Provider value={{ language, setLanguage, t }}>
      {children}
    </LanguageContext.Provider>
  );
};

export const useLanguage = () => {
  const context = useContext(LanguageContext);
  if (!context) {
    throw new Error('useLanguage must be used within a LanguageProvider');
  }
  return context;
};
