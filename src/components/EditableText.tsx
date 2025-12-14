import { useAuth } from '@/contexts/AuthContext';
import { cn } from '@/lib/utils';

interface EditableTextProps {
  children: React.ReactNode;
  className?: string;
  as?: 'p' | 'h1' | 'h2' | 'h3' | 'span' | 'div';
}

const EditableText = ({ children, className, as: Component = 'span' }: EditableTextProps) => {
  const { isAdmin } = useAuth();

  return (
    <Component
      contentEditable={isAdmin}
      suppressContentEditableWarning
      className={cn(
        className,
        isAdmin && 'outline-none hover:ring-1 hover:ring-aluminum/30 focus:ring-2 focus:ring-aluminum/50 rounded px-1 -mx-1 transition-all'
      )}
    >
      {children}
    </Component>
  );
};

export default EditableText;
