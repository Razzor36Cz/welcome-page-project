import { useState, useEffect } from 'react';

export type BackgroundType = 'color' | 'image' | 'video';

interface PageBackground {
  type: BackgroundType;
  url: string;
}

const STORAGE_KEY = 'page-backgrounds';

const getStoredBackgrounds = (): Record<string, PageBackground> => {
  try {
    const stored = localStorage.getItem(STORAGE_KEY);
    return stored ? JSON.parse(stored) : {};
  } catch {
    return {};
  }
};

const setStoredBackground = (pageId: string, background: PageBackground) => {
  const stored = getStoredBackgrounds();
  stored[pageId] = background;
  localStorage.setItem(STORAGE_KEY, JSON.stringify(stored));
};

export const usePageBackground = (pageId: string) => {
  const [background, setBackground] = useState<PageBackground | null>(null);

  useEffect(() => {
    const stored = getStoredBackgrounds();
    if (stored[pageId]) {
      setBackground(stored[pageId]);
    }
  }, [pageId]);

  const updateBackground = (file: File) => {
    const url = URL.createObjectURL(file);
    const type: BackgroundType = file.type.startsWith('video/') ? 'video' : 'image';
    const newBackground = { type, url };
    setBackground(newBackground);
    setStoredBackground(pageId, newBackground);
  };

  const clearBackground = () => {
    setBackground(null);
    const stored = getStoredBackgrounds();
    delete stored[pageId];
    localStorage.setItem(STORAGE_KEY, JSON.stringify(stored));
  };

  return { background, updateBackground, clearBackground };
};
