<?php

namespace Serge\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Serge\ShopBundle\Entity\Shop;
use Serge\ShopBundle\Form\ShopType;

/**
 * Shop controller.
 *
 * @Route("/")
 */
class ShopController extends Controller
{
    /**
     * Lists all Shop entities.
     *
     * @Route("/", name="shop")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ShopBundle:Shop')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Shop entity.
     *
     * @Route("/{id}/show", name="shop_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ShopBundle:Shop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Shop entity.
     *
     * @Route("/new", name="shop_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Shop();
        $form   = $this->createForm(new ShopType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Shop entity.
     *
     * @Route("/create", name="shop_create")
     * @Method("POST")
     * @Template("ShopBundle:Shop:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Shop();
        $form = $this->createForm(new ShopType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('shop_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Shop entity.
     *
     * @Route("/{id}/edit", name="shop_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ShopBundle:Shop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $editForm = $this->createForm(new ShopType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Shop entity.
     *
     * @Route("/{id}/update", name="shop_update")
     * @Method("POST")
     * @Template("ShopBundle:Shop:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ShopBundle:Shop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ShopType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('shop_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Shop entity.
     *
     * @Route("/{id}/delete", name="shop_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ShopBundle:Shop')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Shop entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('shop'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
